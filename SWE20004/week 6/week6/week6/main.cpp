#include <iostream>
#include <algorithm>
using namespace std;


const int ARRAYSIZE = 20;
char arr[ARRAYSIZE];
char key[1];
int array1[255] = {0};
int max1 = 0;


void sortarray()
{

	sort(arr, arr + sizeof(arr));
	
	for (int i = 0; i < ARRAYSIZE; i++)
	{
		cout << arr[i];

	}
}



void repeats()
{	
	char ans = char{};
	for (int i = 0; i < ARRAYSIZE; i++)
	{
		++array1[arr[i]];


		if (array1[arr[i]] > max1)
		{
			max1 = array1[arr[i]];
			ans = arr[i];

		}
	}
	int count = 0;
	for (int i = 0; i < ARRAYSIZE; i++)
	{
		if (ans == arr[i])
		{
			count = count + 1;
		}
	}
	
	if (count < 2)
	{
		cout << "no repeated char";

	}
	else
	{
		cout<< "most reapted char is: " << ans << " appearing : " << count << " times.";
	}
}


int main()
{
	for (int i = 0; i < ARRAYSIZE; i++)
	{	
		
		
		cin >> key;
		

		if (isdigit(key[0]))
		{
			cout << key[0]<< " is a " << "number" << endl;
			i = i - 1;
			
		}
		else
		{
			for (int a= 0; a< ARRAYSIZE; a++)
			{
				if (arr[a] == key[0])
				{
					cout << key[0] << " is a " << "duplicate" << endl;
					break;
				}
				
			}
			arr[i] = key[0];
			
		}


	}
	cout << "unsorted array: ";
	for (int i = 0; i < ARRAYSIZE; i++)
	{
		cout << arr[i];

	}
	cout << endl << "sorted array: ";
	
	sortarray();

	cout << endl;
		
	repeats();


	return 0;
	



}