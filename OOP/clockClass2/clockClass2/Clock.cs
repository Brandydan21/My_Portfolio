using System;
namespace clockClass2;

public class Clock
{
    private Counter[] myTime = new Counter[7];
    
    public Clock()
    {
        myTime[0] = new Counter("units seconds");
        myTime[1] = new Counter("tens seconds");
        myTime[2] = new Counter("units minutes");
        myTime[3] = new Counter("tens minutes");
        myTime[4] = new Counter("unit hours");
        myTime[5] = new Counter("tens hours");
        myTime[6] = myTime[0];
    }

    public void Tick()
    {
        if (myTime[0].Ticks < 9)
        {
            myTime[0].Increment();
        }
        else
        {
            myTime[0].Reset();
            if (myTime[1].Ticks < 5)
            {
                myTime[1].Increment();
            }
            else
            {
                myTime[1].Reset();
                if (myTime[2].Ticks < 9)
                {
                    myTime[2].Increment();
                }
                else
                {
                    myTime[2].Reset();
                    if (myTime[3].Ticks < 5)
                    {
                        myTime[3].Increment();
                    }
                    else
                    {
                        myTime[3].Reset();
                        if(myTime[5].Ticks < 2)
                        {
                            if (myTime[4].Ticks < 9)
                            {
                                myTime[4].Increment();
                            }
                            else
                            {
                                myTime[4].Reset();
                                myTime[5].Increment();
                            }

                        }
                        else
                        {
                            if (myTime[4].Ticks < 3)
                            {
                                myTime[4].Increment();
                            }
                            else
                            {
                                myTime[0].Reset();
                                myTime[1].Reset();
                                myTime[2].Reset();
                                myTime[3].Reset();
                                myTime[4].Reset();
                                myTime[5].Reset();
                            }
                        }
                        
                    }
                }
            }
        }
    }
    public void readtime()
    {
        Console.WriteLine("{0}{1}:{2}{3}:{4}{5}", myTime[5].Ticks, myTime[4].Ticks, myTime[3].Ticks, myTime[2].Ticks, myTime[1].Ticks, myTime[0].Ticks);
    }

}



