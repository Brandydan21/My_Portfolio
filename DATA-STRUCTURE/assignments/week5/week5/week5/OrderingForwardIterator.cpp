#include "OrderingForwardIterator.h"



void OrderingForwardIterator::setMapPosition()
{
	for (size_t i = 0; i < fCollection->size(); i++)
	{
		if ((*fCollection)[i].key() == fIndex)
		{
			fMapPosition = i;
			break;
		}
	}
}

OrderingForwardIterator::OrderingForwardIterator(const DataWrapper* aCollection) noexcept :
	fIndex(0),
	fCollection(aCollection),
	fMapPosition(0)

{
	setMapPosition();
}


const DataMap& OrderingForwardIterator::operator*() noexcept
{
	return (*fCollection)[fMapPosition];
}

OrderingForwardIterator& OrderingForwardIterator::operator++() noexcept
{
	fIndex++;
	setMapPosition();
	return *this;
}


OrderingForwardIterator OrderingForwardIterator:: operator++(int) noexcept
{
	OrderingForwardIterator old = *this;

	++(*this);
	return old;
}

bool OrderingForwardIterator :: operator==(const OrderingForwardIterator& aOther) const noexcept
{
	return fCollection == aOther.fCollection && fIndex == aOther.fIndex;

}


bool OrderingForwardIterator::operator!=(const OrderingForwardIterator& aOther) const noexcept
{
	return !(*this == aOther);
}

OrderingForwardIterator OrderingForwardIterator::begin() const noexcept
{
	OrderingForwardIterator copy = *this;
	
	copy.fIndex = 0;
	copy.fMapPosition = 0;
	copy.setMapPosition();

	return copy;
}

OrderingForwardIterator OrderingForwardIterator::end() const noexcept
{
	OrderingForwardIterator copy = *this;
	copy.fIndex = fCollection->size();
	return copy;
}
