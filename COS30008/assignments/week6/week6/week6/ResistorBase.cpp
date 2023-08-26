#include "ResistorBase.h"

using namespace std;

void ResistorBase::setBaseValue(double aBaseValue) noexcept
{
	fBaseValue = aBaseValue;

}

ResistorBase::ResistorBase(double aBaesValue) noexcept
{
	setBaseValue(aBaesValue);
}

double ResistorBase::getBaseValue() const noexcept
{
	return fBaseValue;
}

double ResistorBase::getPotentialAt(double aCurrent, double aFrequency) const noexcept
{
	return getReactance(aFrequency) * aCurrent;
}

double ResistorBase::getCurrentAt(double aVoltage, double aFrequency) const noexcept
{
	return aVoltage / getReactance(aFrequency);

}

istream& operator >> (istream& aIStream, ResistorBase& aObject)
{
	double IRawValue;
	string IRawUnit;

	aIStream >> IRawValue >> IRawUnit;
	
	aObject.convertUnitValueToBaseValue(IRawValue, IRawUnit);
	
	return aIStream;

}

ostream& operator <<(ostream& aOStream, const ResistorBase& aObject)
{
	double INormalizedValue;
	string INormalizedUnit;

	aObject.convertBaseValueToUnitValue(INormalizedValue, INormalizedUnit);

	aOStream << INormalizedValue << INormalizedUnit;

	return aOStream;

}

