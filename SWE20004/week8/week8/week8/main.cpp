#include <iostream>

using namespace std;

void reorder(int* a, int* b, int* c)
{
	int holder;
	if (*a > *b) {
		holder = *a;
		*a = *b;
		*b = holder;
	}
	if (*b > *c) {
		int holder = *b;
		*b = *c;
		*c = holder;
	}
	if (*a > *b) {
		int holder = *a;
		*a = *b;
		*b = holder;
	}
}



int main()
{
	int a = 6, b = 5, c = 12;
	cout << "before:" << endl << "a= " << a << ", b= " << b << ", c= " << c << endl;
	
	reorder(&a, &b, &c);
	
	cout << "after:" << endl << "a= " << a << ", b= " << b << ", c= " << c << endl;

	return 0;
}
