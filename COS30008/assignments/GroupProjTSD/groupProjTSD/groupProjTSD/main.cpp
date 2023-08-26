#include <iostream>
#include <vector>
#include <sstream>
#include <string>

#include "voter.h"
#include "candidate.h"

using namespace std;

const string VOTER_FILE = "voter.txt";
const string CANDIDATE_FILE = "candidate.txt";

vector<candidate_t> candidates = {};
vector<voter_t> voters = {};

char menu();
void reprint_menu();
void highest_candidate();
void lowest_candidate();
void add_votes();
void print_votes();
void read_candidates();
void read_voters();
void write_candidates();
void write_voters();



int main()
{
    read_voters();
    read_candidates();
    bool quit = false;

    while (!quit)
    {
        char userinput;
        userinput = menu();

        switch (toupper(userinput)) //toupper switches lowercase to upper case, so both will work
        {
        case 'P':
            print_votes();
            break;
        case 'A':
            add_votes();
            break;
        case 'S':
            lowest_candidate();
            break;
        case 'L':
            highest_candidate();
            break;
        case 'Q':
            write_voters();
            write_candidates();
            quit = true;
        }
    }
}

void write_voters()
{
    ofstream file;

    file.open(VOTER_FILE, ios::trunc); //trunc flag clears whole file before writing to it.
    for (int i = 0; i < voters.size(); ++i) {
        voter_t vote = voters[i];
        file << vote.voter_id << " " << vote.first_name << " " << vote.second_name << " " << vote.age << " "
            << vote.gender << " " << vote.suburb << " " << vote.state << " " << vote.date_of_birth << " " << vote.country_of_birth << " "
            << vote.candidate_choice << endl;
    }
}

void write_candidates()
{
    ofstream file;
    // truncate to simplify the implementatio
    file.open(CANDIDATE_FILE, ios::trunc);
    for (int i = 0; i < candidates.size(); ++i) {
        candidate_t cand = candidates[i];
        file << cand.id << " " << cand.first_name << " " << cand.last_name << " " << cand.age << " "
            << cand.gender << " " << cand.suburb << " " << cand.party << " "
            << cand.symbol << " " << cand.years_in_politics << " " << cand.count << endl;
    }
}

void read_voters() {
    string line;

    ifstream file(VOTER_FILE);

    if (file.is_open()) {
        while (getline(file, line)) {
            vector<string> voter_element;
            istringstream iss(line);
            for (string line; iss >> line;) {
                voter_element.push_back(line);
            }

            voter_t vote;
            vote.voter_id = stoi(voter_element[0]);
            vote.first_name = voter_element[1];
            vote.second_name = voter_element[2];
            vote.age = stoi(voter_element[3]);
            vote.gender = voter_element[4];
            vote.suburb = voter_element[5];
            vote.state = voter_element[6];
            vote.date_of_birth = voter_element[7];
            vote.country_of_birth = voter_element[8];
            vote.candidate_choice = voter_element[9];

            voters.push_back(vote);
        }
    }
}

void read_candidates() {
    string line;

    ifstream file(CANDIDATE_FILE);

    if (file.is_open()) {
        while (getline(file, line)) {
            vector<string> candidate_element;
            istringstream iss(line);
            for (string line; iss >> line;) {
                candidate_element.push_back(line);
            }

            candidate_t cand;
            cand.id = stoi(candidate_element[0]);
            cand.first_name = candidate_element[1];
            cand.last_name = candidate_element[2];
            cand.age = stoi(candidate_element[3]);
            cand.gender = candidate_element[4];
            cand.suburb = candidate_element[5];
            cand.party = candidate_element[6];
            cand.symbol = candidate_element[7];
            cand.years_in_politics = stoi(candidate_element[8]);
            cand.count = stoi(candidate_element[9]);

            candidates.push_back(cand);
        }
    }
}
void print_votes()
{
    int choice;

    cout << "Enter the candidate ID number: " << endl;
    cin >> choice;
    while (choice < 1 || choice > 10)
    {
        cout << "Please enter the candidate ID number between 1 and 10: " << endl;
        cin >> choice;
    }
    cout << "Candidate " << candidates[choice - 1].id << " - " << candidates[choice - 1].last_name << " has " << candidates[choice - 1].count << " votes" << endl;
}

void add_votes()
{
    int voterschoice, candidatechoice;

    cout << "Enter the voter ID number: " << endl;
    cin >> voterschoice;

    while (voterschoice > voters.size() || voterschoice < 0)
    {
        cout << "Enter the voter ID number: " << endl;
        cin >> voterschoice;
    }

    cout << "Enter the candidate ID number: " << endl;
    cin >> candidatechoice;

    while (candidatechoice > candidates.size() || candidatechoice < 0)
    {
        cout << "Enter the candidate ID number: " << endl;
        cin >> candidatechoice;
    }

    voters[voterschoice - 1].candidate_choice = candidatechoice;
    candidates[candidatechoice - 1].count += 1;
    cout << candidates[candidatechoice - 1].id << ". " << candidates[candidatechoice - 1].last_name << " now has " << candidates[candidatechoice - 1].count << " votes " << endl;

}


void lowest_candidate()
{
    int temp = candidates[0].count;
    for (int i = 0; i < candidates.size(); i++)
    {
        if (temp > candidates[i].count)
        {
            temp = candidates[i].count;
        }
    }


    for (int i = 0; i < candidates.size(); i++) {
        if (temp == candidates[i].count) {
            cout << "The lowest amount of votes is Candidate " << candidates[i].id << ". "
                << candidates[i].last_name << " with " << candidates[i].count << " votes" << endl;
        }
    }
}


void highest_candidate()
{
    int large;
    large = candidates[0].count;
    for (int i = 1; i < candidates.size(); i++) {
        if (candidates[i].count > large) {
            large = candidates[i].count;
        }
    }


    for (int i = 0; i < candidates.size(); i++) {
        if (large == candidates[i].count) {
            cout << "The highest amount of votes is Candidate " << candidates[i].id << ". " << candidates[i].last_name << " with " << candidates[i].count
                << " votes" << endl;
        }
    }
}

void reprint_menu() {
    cout << endl;
    cout << "Main menu:" << endl << "Please choose from the following" << endl;
    cout << "P - Candidate number of votes" << endl;
    cout << "A - Add number of votes to a candidate" << endl;
    cout << "S - Display the smallest number of votes candidate" << endl;
    cout << "L - Display the largest number of votes candidate" << endl;
    cout << "Q - Quit and data to database" << endl;
}


char menu()
{
    char userinput;
    reprint_menu();
    cin >> userinput;
    userinput = toupper(userinput);
    cout << endl;

    while (userinput != 'P' && userinput != 'A' && userinput != 'S' && userinput != 'L' && userinput != 'Q')
    {
        cout << "Seletion is not valid, please choose an option from the menu." << endl;
        reprint_menu();
        cin >> userinput;
        cout << endl;

        userinput = toupper(userinput);
    }

    return userinput;
}

