#include "Polygon.h"

#include <iostream>
#include <fstream>
#include <cmath>
#include <stdexcept>

using namespace std;

Polygon::Polygon() noexcept:
	fNumberOfVertices(0)
{
}

size_t Polygon:: getNumberOfVertices() const noexcept
{
	return fNumberOfVertices;

}

const Vector2D& Polygon::getVertex(size_t aIndex) const 
{
	if (aIndex < fNumberOfVertices)
	{
		return fVertices[aIndex];

	}
	throw out_of_range("illegal index value."); 
}

void Polygon::readData(std::istream& aIStream)
{
	  /*int i = 0;*/
	while (aIStream >> fVertices[fNumberOfVertices])
	{
		fNumberOfVertices++;
	}
}

float Polygon::getPerimeter() const noexcept
{
	float Result = 0.0f;

	for (size_t i = 0; i < fNumberOfVertices; i++)
	{
		Vector2D lStart = fVertices[i];
		Vector2D lEnd = fVertices[(i + 1) % fNumberOfVertices];
		Vector2D lSegment = lEnd - lStart;

		Result += lSegment.length();

	}

	return Result;

}


Polygon Polygon::scale(float aScalar)const noexcept
{ 
	Polygon Result = *this;

	for (size_t i = 0; i < fNumberOfVertices; i++)
	{
		Result.fVertices[i] = fVertices[i] * aScalar;
	}
	return Result;

}
