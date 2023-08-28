using System;
namespace semTest
{
    public class MinMaxSummary : SummaryStrategy
    {
        
        

        private int Minimum(List<int> numbers)
        {
            int min = numbers[0];
            foreach(var i in numbers)
            {
                if(i < min)
                {
                    min = i;
                }
            }
            return min;
        }

        private int Maximum(List<int> numbers)
        {
            int max = numbers[0];
            foreach (var i in numbers)
            {
                if (i > max)
                {
                   max = i;
                }
            }
            return max;
        }

        public override void PrintSummary(List<int> numbers)
        {
            int min = Minimum(numbers);
            int max = Maximum(numbers);
            Console.WriteLine("min: {0}, max: {1}", min, max);
        }
    }
}

