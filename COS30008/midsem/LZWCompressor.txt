#include "LZWCompressor.h"

bool LZWCompressor::readK() noexcept
{
	fIndex++;
	
	if (fIndex <= fInput.size())
	{	
		
		fK = fInput[fIndex];
		return true;

	}
	
	fK = -1;
	return false;


}

void LZWCompressor::start()
{
	fTable.initialize();
	fK = fInput[fIndex];
	fW = fTable.lookupStart(fK);
	fCurrentCode = nextCode();
}

uint16_t LZWCompressor::nextCode()
{
	
	PrefixString wk;
	uint16_t out;
	
	if (fK == -1)
	{
		return	-1;
	}

	else
	{
		while (readK())
		{

			PrefixString wk = fW + fK;

			if (fTable.contains(wk))
			{
				fW = wk;

			}
			else
			{

				out = fW.getCode();
				fTable.add(wk);
				fW = fTable.lookupStart(fK);
				return out;
			}
		}
		return fW.getCode();
	}
	
	
}


LZWCompressor::LZWCompressor(const std::string& aInput) :
	fInput(aInput),
	fIndex(0),
	fCurrentCode(),
	fK(),
	fW(),
	fTable()
{
	start();
}

LZWCompressor& LZWCompressor::operator++()noexcept
{
	fCurrentCode = nextCode();
	return *this;
}

LZWCompressor LZWCompressor::operator++(int) noexcept
{
	LZWCompressor old = *this;
	++(*this);
	return old;
}

bool LZWCompressor::operator==(const LZWCompressor& aOther) const noexcept
{
	return fIndex == aOther.fIndex && fCurrentCode == aOther.fCurrentCode && fK == aOther.fK;
}

bool LZWCompressor::operator!=(const LZWCompressor& aOther) const noexcept
{
	return !(*this == aOther);
}

const uint16_t& LZWCompressor::operator*() const noexcept
{
	return fCurrentCode;
}

LZWCompressor LZWCompressor::begin() const noexcept
{	
	LZWCompressor copy = *this;
	copy.start();
	copy.fCurrentCode = this->fCurrentCode;
	return copy;

}

LZWCompressor LZWCompressor::end() const noexcept
{
	LZWCompressor copy = *this;
	copy.fIndex = fInput.size()+1;
	copy.fK = -1;
	copy.fCurrentCode = -1;
	return copy;
}
