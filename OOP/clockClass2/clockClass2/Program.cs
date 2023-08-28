using System;

namespace clockClass2

{
    internal class Program
    {



        private static void PrintTime(Counter[] time)
        {
            Console.WriteLine("Hi");
            Console.WriteLine("{0} : {1} : {2}", time[2].Ticks, time[1].Ticks, time[0].Ticks);
        }





        public static void Main(string[] args)
        {
            Clock myClock;
            myClock = new Clock();

            for (int i = 0; i < 86400; i++)
            {
                myClock.Tick();
                myClock.readtime();
            }

            
        }
    }
}