using System;
using clockClass;

namespace NUnitTest
{
    public class counterTest
    {
        Counter myCounter;

        [SetUp]
        public void Setup()
        {
            myCounter = new Counter("counter");
        }

        [Test]
        public void testTime()
        {
            for (int i = 0; i < 120; i++)
            {
                myCounter.Increment();

            }

            Assert.AreEqual(120, myCounter.Ticks);

        }

        [Test]
        public void testTime2()
        {
            for (int i = 0; i < 30000; i++)
            {
                myCounter.Increment();

            }

            Assert.AreEqual(30000, myCounter.Ticks);

        }

        [Test]
        public void testrest()
        {
            for (int i = 0; i < 30000; i++)
            {
                myCounter.Increment();

            }

            myCounter.Reset();

            Assert.AreEqual(0, myCounter.Ticks);

        }

        [Test]
        public void testname()
        {
            

            Assert.AreEqual("counter", myCounter.Name);

        }
    }
}

