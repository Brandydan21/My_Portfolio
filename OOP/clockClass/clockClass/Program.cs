using System;

namespace clockClass

{
    internal class Program
    {
        
       
        public static void Main(string[] args)
        {
            Clock myClock;
            myClock = new Clock();

            for (int i = 0; i < 120; i++)
            {
                myClock.Tick();
                Console.WriteLine(myClock.Read);
            }


        }
    }
}



























