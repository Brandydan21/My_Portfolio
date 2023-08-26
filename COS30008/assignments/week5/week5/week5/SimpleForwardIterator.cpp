#include "SimpleForwardIterator.h"



SimpleForwardIterator::SimpleForwardIterator(const DataWrapper* aCollection) noexcept :
	fCollection(aCollection),
	fIndex(0)
{}

const DataMap& SimpleForwardIterator::operator*() noexcept
{
	return (*fCollection)[fIndex];
}

SimpleForwardIterator& SimpleForwardIterator::operator++() noexcept
{
	fIndex++;
	return *this;
}

SimpleForwardIterator SimpleForwardIterator::operator++(int) noexcept
{
	fIndex--;
	return *this;
}

bool SimpleForwardIterator::operator==(const SimpleForwardIterator& aOther) const noexcept
{
	return fCollection == aOther.fCollection && fIndex == aOther.fIndex;
}


bool SimpleForwardIterator::operator!=(const SimpleForwardIterator& aOther) const noexcept
{
	return !(*this == aOther);
}

SimpleForwardIterator SimpleForwardIterator::begin() const noexcept
{
	SimpleForwardIterator copy = *this;
	copy.fIndex = 0;
	return copy;
}

SimpleForwardIterator SimpleForwardIterator::end() const noexcept
{
	SimpleForwardIterator copy = *this;

	
	copy.fIndex = fCollection->size();
	return copy;

}

