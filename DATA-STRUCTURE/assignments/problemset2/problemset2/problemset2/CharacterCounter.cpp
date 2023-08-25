#include "CharacterCounter.h"
#include <iostream>
#include <algorithm>




CharacterCounter::CharacterCounter() noexcept:
	fTotalNumberOfCharacters(0),fCharacterCounts()
{}

void CharacterCounter::count(unsigned char aCharacter) noexcept
{
	bool a = true;
	for (int i = 0; i < 256; i++)
	{
		if (aCharacter == fCharacterCounts[i].character())
		{
			fCharacterCounts[i].increment();
			a = false;
		}
	}
	
	if (a == true)
	{
		fCharacterCounts[fTotalNumberOfCharacters].setCharacter(aCharacter);
		fCharacterCounts[fTotalNumberOfCharacters].increment();
		fTotalNumberOfCharacters++;	
	}

	for (int i = 1; i < 256; i++)
	{
		CharacterMap key = fCharacterCounts[i];

		int j = i - 1;
		while (j >= 0 && fCharacterCounts[j].character() > key.character())
		{
			std::swap(fCharacterCounts[j + 1], fCharacterCounts[j]);
			j = j - 1; 
		}
		fCharacterCounts[j + 1] = key;
	}


}


const CharacterMap& CharacterCounter::operator[](unsigned char aCharacter) const noexcept
{
	return fCharacterCounts[aCharacter];
}
