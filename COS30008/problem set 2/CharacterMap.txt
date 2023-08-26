#include "CharacterMap.h"
#include <cstddef>

CharacterMap::CharacterMap(unsigned char aCharacter , int aFrequency ) noexcept:
	fCharacter(aCharacter), fFrequency(aFrequency)
{}

void CharacterMap:: increment() noexcept
{
	fFrequency++;
}


void CharacterMap::setCharacter(unsigned char aCharacter) noexcept
{
	fCharacter = aCharacter;
}

bool CharacterMap::operator<(const CharacterMap& aOther) const noexcept
{
	return (*this).fFrequency < aOther.fFrequency;
}

unsigned char CharacterMap::character() const noexcept
{
	return fCharacter;
}

size_t CharacterMap::frequency() const noexcept
{
	return fFrequency;
}



