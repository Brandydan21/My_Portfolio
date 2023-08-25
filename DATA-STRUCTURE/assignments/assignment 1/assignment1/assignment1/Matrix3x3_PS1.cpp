#define _USE_MATH_DEFINES
#include "Matrix3x3.h"
#include <cassert>
#include<cmath>

Matrix3x3 Matrix3x3 :: operator*(const Matrix3x3& aOther) const noexcept
{

	return Matrix3x3(Vector3D(row(0).dot(aOther.column(0)), row(0).dot(aOther.column(1)), row(0).dot(aOther.column(2))),
		Vector3D(row(1).dot(aOther.column(0)), row(1).dot(aOther.column(1)), row(1).dot(aOther.column(2))),
		Vector3D(row(2).dot(aOther.column(0)), row(2).dot(aOther.column(1)), row(2).dot(aOther.column(2))));


}

float Matrix3x3::det() const noexcept
{
	

	return row(0)[0] * ((row(1)[1] * row(2)[2]) - (row(1)[2] * row(2)[1])) -
		row(0)[1] * ((row(1)[0] * row(2)[2]) - (row(1)[2] * row(2)[0])) +
		row(0)[2] * ((row(1)[0] * row(2)[1]) - (row(1)[1] * row(2)[0]));

}

Matrix3x3 Matrix3x3::transpose() const noexcept
{
	return Matrix3x3(column(0), column(1), column(2));
}

Matrix3x3 Matrix3x3::inverse() const

{
	if (!det())
		throw std::invalid_argument("determinat can't equal 0");

	float value = 1 / det();



	return Matrix3x3(
		Vector3D((row(1)[1] * row(2)[2] - row(1)[2] * row(2)[1]) * value,
			(row(0)[2] * row(2)[1] - row(0)[1] * row(2)[2]) * value,
			(row(0)[1] * row(1)[2] - row(0)[2] * row(1)[1]) * value),

		Vector3D((row(1)[2] * row(2)[0] - row(1)[0] * row(2)[2]) * value,
			(row(0)[0] * row(2)[2] - row(0)[2] * row(2)[0]) * value,
			(row(0)[2] * row(1)[0] - row(0)[0] * row(1)[2]) * value),

		Vector3D((row(1)[0] * row(2)[1] - row(1)[1] * row(2)[0]) * value,
			(row(0)[1] * row(2)[0] - row(0)[0] * row(2)[1]) * value,
			(row(0)[0] * row(1)[1] - row(0)[1] * row(1)[0]) * value)

		);




}

bool Matrix3x3::hasInverse() const noexcept
{
	if (det() != 0)
	{
		return true;
	}
	else
		return false;
}

std::ostream& operator<<(std::ostream& aOStream, const Matrix3x3& aMatrix)
{
	
	return aOStream << "[" << aMatrix.row(0) << aMatrix.row(1) << aMatrix.row(2) << "]" << std::endl;
	

}
