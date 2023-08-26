// Flushing files (flush manipulator)
#include <ostream>      // std::flush
#include <fstream>      // std::ofstream
#include <iostream>
using namespace std;

int num;
int main() 
{   
	
	cout << "Enter your favourite number between 1 and 100: ";
	cin >> num;

	cout << "Amazing!! That's my favorite number too!" << endl << "No really!!, " << num << " is my favourite number!";



	return 0;
}