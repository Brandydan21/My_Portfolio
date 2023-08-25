
// COS30008, Final Exam, 2023

#include "DSPStringIterator.h"

DSPStringIterator::DSPStringIterator( const DSPString& aCollection ) :
	fCollection( std::make_shared<DSPString>( aCollection ) ),
	fIndex( 0 )
{}

char DSPStringIterator::operator*() const noexcept
{
	return (*fCollection)[fIndex];
}

DSPStringIterator& DSPStringIterator::operator++() noexcept
{
	fIndex++;
	return *this;
}

DSPStringIterator DSPStringIterator::operator++( int ) noexcept
{
	DSPStringIterator old = *this;

	++(*this);

	return old;
}

DSPStringIterator& DSPStringIterator::operator--() noexcept
{
	fIndex--;
	return *this;
}

DSPStringIterator DSPStringIterator::operator--( int ) noexcept
{
	DSPStringIterator old = *this;

	--(*this);

	return old;
}

bool DSPStringIterator::operator==( const DSPStringIterator& aOther ) const noexcept
{
	return fCollection == aOther.fCollection && fIndex == aOther.fIndex;
}

bool DSPStringIterator::operator!=( const DSPStringIterator& aOther ) const noexcept
{
	return !(*this == aOther);
}

DSPStringIterator  DSPStringIterator::begin() const noexcept
{
	DSPStringIterator copy = *this;
	copy.fIndex = 0;
	return copy;
}

DSPStringIterator DSPStringIterator::end() const noexcept
{
	DSPStringIterator copy = *this;
	size_t size = 0;
	for (int i = 0; (*fCollection)[i] != '\0'; ++i) {
		size++;
	}
	copy.fIndex = size;
	
	return copy;
}

DSPStringIterator DSPStringIterator::rbegin() const noexcept
{
	DSPStringIterator copy = *this;
	size_t size = 0;
	for (int i = 0; (*fCollection)[i] != '\0'; ++i) {
		size++;
	}
	copy.fIndex = size;

	return copy;
}

DSPStringIterator DSPStringIterator::rend() const noexcept
{
	DSPStringIterator copy = *this;
	copy.fIndex = 1;
	return copy;
}
