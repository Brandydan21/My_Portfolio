#include "LZWTable.h"
#include <assert.h>



void LZWTable::initialize()
{	
	
	for (; fIndex < fInitialCharacters; fIndex++)
	{
		fEntries[fIndex] = PrefixString(fIndex);
		fEntries[fIndex].setCode(fIndex);	
	}
	
}

LZWTable::LZWTable(uint16_t aInitialCharacters) :
	fEntries(),
	fIndex(0),
	fInitialCharacters(128)
{
	initialize();
}

const PrefixString& LZWTable::lookupStart(char aK) const noexcept
{	
	assert(static_cast<int>(aK) < 128);

	for (int i = 0; i < 128; i++)
	{
		if (fEntries[i].K() == aK)
		{
			return fEntries[i];
		}
	}
}

bool LZWTable::contains(PrefixString& aWK) const noexcept
{
	assert(aWK.w() != -1);
	
	for (int i = fIndex; i > aWK.w(); i--)
	{ 
		if (fEntries[i] == aWK) 
		{
			aWK.setCode(fEntries[i].getCode());
			return true;
		}
	}
	return false;
	
}

void LZWTable::add(PrefixString& aWK) noexcept
{
	assert(aWK.w() != -1);
	
	aWK.setCode(fIndex);
	fEntries[fIndex] = aWK;
	fIndex++;
}
