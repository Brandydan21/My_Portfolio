#include "PrefixString.h"
#include <assert.h>

PrefixString::PrefixString(char aExtension)noexcept :
	fCode(-1),
	fPrefix(-1),
	fExtension(aExtension)
{}

PrefixString::PrefixString(uint16_t aPrefix, char aExtension) noexcept :
	fCode(-1),
	fPrefix(aPrefix),
	fExtension(aExtension)
{}


uint16_t PrefixString::w() const noexcept
{
	return fPrefix;
}


char PrefixString::K() const noexcept
{
	return fExtension;
}


uint16_t PrefixString:: getCode() const noexcept
{
	return fCode;
}


void PrefixString::setCode(uint16_t aCode) noexcept
{
	fCode = aCode;
}

PrefixString PrefixString::operator+(char aExtension) const noexcept
{
	assert(fCode != -1);
	
	return PrefixString(this->getCode(), aExtension);
	
	
}

bool PrefixString::operator==(const PrefixString& aOther) const noexcept
{
	if (this->w() == aOther.w() && this->K() == aOther.K())
	{
		return true;
	}
	
	return false;
}

std::ostream& operator<<(std::ostream& aOStream, const PrefixString& aObject)
{
	return aOStream << "(" << aObject.fCode << "," << aObject.fPrefix << "," << aObject.fExtension << ")";
}


