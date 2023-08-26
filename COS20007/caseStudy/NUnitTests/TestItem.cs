using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using NUnit.Framework;
using caseStudy;
//Don't forget this.

namespace NUnitTests //Rename this to the namespace of your project.
{
    [TestFixture]
    public class TestItem //Rename this appropriately.
    {


        private Item ItemShovel;

        [SetUp]
        public void SetUp()
        {

            ItemShovel = new Item(new string[] { "shovel", "spade"}, "a shovel", "this is a might fine...");

        }


        [Test]
        public void TestAre()
        {
            Assert.AreEqual(true, ItemShovel.AreYou("Shovel"));
            
        }

        [Test]
        public void TestShortDescription()
        {
            Assert.AreEqual("a shovel (shovel)", ItemShovel.ShortDescription);

        }

        [Test]
        public void TestFullDescription()
        {
            Assert.AreEqual("this is a might fine...", ItemShovel.FullDescription);

        }

        









    }
}
