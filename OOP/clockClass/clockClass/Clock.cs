using System;
namespace clockClass
{
    public class Clock
    {
        private Counter[] myTime = new Counter[3];



        public Clock()
        {
           
            myTime[0] = new Counter("Seconds");
            myTime[1] = new Counter("Minutes");
            myTime[2] = new Counter("Hours");
            

        }

        

        public void Tick()
            {
            if (myTime[0].Ticks < 59)
            {
                myTime[0].Increment();
            }
            else
            {
                myTime[0].Reset();
                if (myTime[1].Ticks < 59)
                {
                    myTime[1].Increment();
                }
                else
                {
                    myTime[1].Reset();
                    if (myTime[2].Ticks < 23)
                    {
                        myTime[2].Increment();
                    }
                    else
                    {
                        Reset();
                    }
                }
            }

            }

        public void Reset()
        {
            myTime[0].Reset();
            myTime[1].Reset();
            myTime[2].Reset();
        }


        public string Read
        {
            get
            {
                return String.Format("{0:00} : {1:00} : {2:00}", myTime[2].Ticks, myTime[1].Ticks, myTime[0].Ticks);
            }
        }


    }
}

