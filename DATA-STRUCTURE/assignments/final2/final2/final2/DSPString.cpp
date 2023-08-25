
// COS30008, Final Exam, 2023

#include "DSPString.h"

#include <cassert>
#include <algorithm>

DSPString::DSPString( const char* aContents )
{
	size_t lSize = 0;

	while ( aContents[lSize] )
	{
		lSize++;
	}

	fContents = new char[++lSize];

	for ( size_t i = 0; i < lSize; i++ )
	{
		fContents[i] = aContents[i];
	}
}

DSPString::~DSPString()
{
	delete fContents;

}

DSPString::DSPString( const DSPString& aOther ) :
	DSPString( aOther.fContents )
{
}

DSPString& DSPString::operator=( const DSPString& aOther )
{
	if (this != &aOther)
	{
		this->~DSPString();
		new (this) DSPString(aOther);
	}
	return *this;

}

DSPString::DSPString( DSPString&& aOther ) noexcept :
	DSPString( "\0" )
{
	std::swap(fContents, aOther.fContents);

}

DSPString& DSPString::operator=( DSPString&& aOther ) noexcept
{
	if (this != &aOther)
	{
		std::swap(fContents, aOther.fContents);
	}
	return *this;

}

size_t DSPString::size() const noexcept
{
	size_t size = 0;
	
	for (int i = 0; fContents[i] != '\0'; ++i) {
		size++;
	}

	return size;
}

char DSPString::operator[]( size_t aIndex ) const noexcept
{
	return fContents[aIndex];

}

bool DSPString::operator==( const DSPString& aOther ) const noexcept
{
	if ( size() == aOther.size() )
	{
		for ( size_t i = 0; i < size(); i++ )
		{
			if ( fContents[i] != aOther.fContents[i] )
			{
				return false;
			}
		}

		return true;
	}

	return false;
}

std::ostream& operator<<( std::ostream& aOStream, const DSPString& aObject )
{	
	return aOStream << aObject.fContents;
}
