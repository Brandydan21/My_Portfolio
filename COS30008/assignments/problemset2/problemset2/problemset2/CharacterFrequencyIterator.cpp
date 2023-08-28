#include "CharacterFrequencyIterator.h"
#include <iostream>
#include <algorithm>


void CharacterFrequencyIterator::mapIndices() noexcept
{
	for (int i = 0; i < 256; i++)
	{
		fMappedIndices[i] = static_cast<unsigned char>(i);
	}
	
	

	for (int i = 1; i < 256; i++)
	{
		unsigned char key = fMappedIndices[i];

		int j = i - 1;
		while (j >= 0 && (*fCollection)[fMappedIndices[j]] < (*fCollection)[key])
		{
			std::swap(fMappedIndices[j + 1], fMappedIndices[j]);
			j = j - 1;
		}
		fMappedIndices[j + 1] = key;
	
	}	
}
CharacterFrequencyIterator::CharacterFrequencyIterator(const CharacterCounter* aCollection) noexcept :
	fCollection(aCollection), fIndex(0)
{
	mapIndices();
}

const CharacterMap& CharacterFrequencyIterator::operator*() const noexcept
{
	return (*fCollection)[fMappedIndices[fIndex]];
}

CharacterFrequencyIterator& CharacterFrequencyIterator::operator++() noexcept
{
	fIndex++;
	return *this;
}

CharacterFrequencyIterator CharacterFrequencyIterator :: operator++(int) noexcept
{
	CharacterFrequencyIterator old = *this;
	++(*this);
	return old;

}

bool CharacterFrequencyIterator:: operator==(const CharacterFrequencyIterator& aOther) const noexcept
{
	return fCollection == aOther.fCollection && fIndex == aOther.fIndex;

}

bool CharacterFrequencyIterator::operator!=(const CharacterFrequencyIterator& aOther) const noexcept
{
	return !(*this == aOther);

}

CharacterFrequencyIterator CharacterFrequencyIterator::begin() const noexcept
{
	CharacterFrequencyIterator copy = *this;

	copy.fIndex = 0;
	copy.mapIndices();
	return copy;


}

CharacterFrequencyIterator CharacterFrequencyIterator::end() const noexcept
{
	CharacterFrequencyIterator copy = *this;
	int result = 0;
	for (int i = 0; i < 256; i++)
	{
		if ((*fCollection)[static_cast<unsigned char>(i)].frequency() != 0)
		{
			result++;
		}
	}
	copy.fIndex = result;
	return copy;

}