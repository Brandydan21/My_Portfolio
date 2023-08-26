#include <iostream>

using namespace std;

int num;
int range;


int main()
{
	cout << "enter number" << endl;
	cin >> num;
	cout << "enter range" << endl;
	cin >> range;

	for (int i = 1; i <= range; i++)
	{
		cout << num << "x" << i << "=" << num * i << endl;
		
	}
	
	
return 0;
}