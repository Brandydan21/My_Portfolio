using System;
namespace semTest
{
    public class DataAnalyser
    {

        private List<int> _numbers = new List<int>();
        
        private SummaryStrategy _strategy;

        public DataAnalyser(List<int> numbers, SummaryStrategy strategy)
        {
           
                _strategy = strategy;


                _numbers = numbers; 

        }
        public DataAnalyser() : this (new List<int> { }, new AverageSummary())
        {

        }

        public SummaryStrategy Strategy
        {
            set
            {
                _strategy = value;
            }
            get
            {
                return _strategy;
            }
        }

    
        

        public void AddNumber(int num)
        {
            _numbers.Add(num);
        }

        public void Summarise()
        {
            _strategy.PrintSummary(_numbers);
        }

        

    }
}

