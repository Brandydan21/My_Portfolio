#define	_USE_MATH_DEFINES
#include <cmath>
#include "Inductor.h"


bool Inductor::mustScale(double aValue) const noexcept
{
	return aValue < 1.0;
}

const double Inductor::getMultiplier() const noexcept
{
	return 1000.0;
}

const std::string Inductor::getMajorUnit() const noexcept 
{
	return "H";
}

const std::string Inductor::getMinorUnits() const noexcept
{
	return "Hmunp";
}

Inductor::Inductor(double aBaseValue) noexcept :
	ResistorBase(aBaseValue)
{}

double Inductor::getReactance(double aFrequency) const noexcept
{
	return (2 * M_PI * aFrequency) * getBaseValue();

}


