#include "PassiveResistor.h"

using namespace std;

bool PassiveResistor::mustScale(double aValue) const noexcept
{
	return aValue >= 1000.0;
}

const double PassiveResistor::getMultiplier() const noexcept
{
	return 1.0 / 1000.0;

}

const string PassiveResistor::getMajorUnit() const noexcept
{
	return "Ohm";
}

const string PassiveResistor::getMinorUnits() const noexcept
{
	return "OhM";
}

PassiveResistor::PassiveResistor(double aBaseValue) noexcept :
	ResistorBase(aBaseValue)
{}

double PassiveResistor::getReactance(double aFrequency) const noexcept
{
	return getBaseValue();

}

