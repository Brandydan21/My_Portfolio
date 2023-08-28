using System;
namespace semTest
{
    public class AverageSummary : SummaryStrategy
    {
        

        private float Average(List<int> numbers)
        {
            float avg = 0;
            foreach(var i in numbers)
            {
                avg += i;
            }

            avg = avg / numbers.Count;
            return avg;
        }

        public override void PrintSummary(List<int> numbers)
        {
            double avg = Average(numbers);
            Console.WriteLine("average: {0}", avg);

        }
    }
}

