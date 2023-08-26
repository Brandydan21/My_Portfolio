#define _USE_MATH_DEFINES
#include < iostream >
#include <cmath>

using namespace std;


int main()
{
	double r;
	double f;
	double e;
	double l;
	double c;
	const double PI = 3.14149;


	
	cout << "resistance in ohms: " << endl;
	cin >>  r; 
	cout << "Electromotive force in volts: " << endl;
	cin >> e;
	cout << "Frequency of the current in Hertz: " << endl;
	cin >> f;
	cout << "Inductance in Henrys: " << endl;
	cin >> l;
	cout << "Capacitance in Farads: " << endl;
	cin >> c;
	
	double result = e / (sqrt(pow(r, 2) + pow((2 * PI * f * l) - (1 / (2 * PI * f * c)), 2)));

	cout << result << "A" << endl;

	return 0;
}
