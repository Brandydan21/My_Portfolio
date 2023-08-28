
using clockClass;

namespace NUnitTest;

public class UnitTest1
{
    Clock myClock;

    [SetUp]
    public void Setup()
    {
        myClock = new Clock();
    }

    [Test]
    public void testTime()
    {
        for (int i = 0; i < 120; i++)
        {
            myClock.Tick();
           
        }

        Assert.AreEqual("00 : 02 : 00", myClock.Read);

    }

    [Test]
    public void testTime2()
    {
        for (int i = 0; i < 7200; i++)
        {
            myClock.Tick();

        }

        Assert.AreEqual("02 : 00 : 00", myClock.Read);

    }


    [Test]
    public void testTimereset()
    {
        for (int i = 0; i < 86400; i++)
        {
            myClock.Tick();

        }

        Assert.AreEqual("00 : 00 : 00", myClock.Read);

    }

    [Test]
    public void testReset()
    {
        for (int i = 0; i < 120; i++)
        {
            myClock.Tick();

        }
        myClock.Reset();
        Assert.AreEqual("00 : 00 : 00", myClock.Read);
    }
}
