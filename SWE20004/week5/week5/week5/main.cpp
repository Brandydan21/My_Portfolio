#include <iostream>
#include <cmath>


using namespace std;

string sign;
float num1, num2;

void math(string op, float num1, float num2);


int main()
{
	cout << "Please enter the numbers:";
	cin >> num1 >> num2;
	cout << "Please enter the operator:";
	cin >> sign;

	
	math(sign, num1, num2);

}

void math(string op, float num1, float num2)
{
	if (op == "+")
	{
		cout<< "The Sum of " << num1 << " and " << num2 << " is: " << num1 + num2;
	}
	else if (op == "-")
	{
		cout << "The Sum of " << num1 << " and " << num2 << " is: " << num1 - num2;

	}
	else if (op == "*")
	{
		cout << "The Sum of " << num1 << " and " << num2 << " is: " << num1 * num2;

	}
	else if (op == "/")
	{
		cout << "The Sum of " << num1 << " and " << num2 << " is: " << num1 / num2;

	}
	else
	{
		cout << ("not arthimatic operator");
	}

}

