using System;
using System.Runtime.InteropServices;

namespace semTest

{
    internal class Program
    {


        public static void Main(string[] args)
        {
            
            DataAnalyser dataAnalyser = new DataAnalyser(new List<int> {1, 0, 3, 8, 6, 4, 5, 2, 6}, new MinMaxSummary());
            dataAnalyser.Summarise();

            dataAnalyser.AddNumber(-2);
            dataAnalyser.AddNumber(3);
            dataAnalyser.AddNumber(12);

            dataAnalyser.Strategy = new AverageSummary();

            dataAnalyser.Summarise();


        }
    }
}



























