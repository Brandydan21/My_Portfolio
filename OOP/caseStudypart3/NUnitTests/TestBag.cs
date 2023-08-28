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
    public class TestBag //Rename this appropriately.
    {

        private Bag _bagtwo;
        private Bag _bag;
        private Item ItemShovel;
        private Item ItemSword;

        [SetUp]
        public void SetUp()
        {

            _bag = new Bag(new string[] { "bag", "bag" }, "bag", "This is a bag");
            ItemShovel = new Item(new string[] { "shovel", "spade" }, "a shovel", "this is a might fine...");
            _bagtwo = new Bag(new string[] { "bag2", "bag two" }, "bag", "This is a bag 2");
            ItemSword = new Item(new string[] { "sword", "blade" }, "a sword", "this is a might fine...");

        }




        [Test]
        public void baglocatesItems()
        {
            _bag.Inventory.Put(ItemShovel);
            Assert.AreEqual(ItemShovel, _bag.Locate("shovel"));


        }

        [Test]
        public void LocatesBagItself()
        {
            Assert.AreEqual(_bag, _bag.Locate("bag"));
        }

        [Test]
        public void BaglocatesNothing()
        {
            Assert.AreEqual(null, _bag.Locate("car"));
        }

        [Test]
        public void BagFullDescription()
        {
            _bag.Inventory.Put(ItemShovel);
            Assert.AreEqual("\nIn the bag you can see:\n\ta shovel (shovel)\n", _bag.FullDescription);
        }

        [Test]
        public void testbaginbag()
        {
            _bag.Inventory.Put(_bagtwo);
            _bag.Inventory.Put(ItemShovel);
            _bagtwo.Inventory.Put(ItemSword);

            Assert.AreEqual(_bagtwo, _bag.Locate("bag2"));
            Assert.AreEqual(ItemShovel, _bag.Locate("shovel"));
            Assert.AreEqual(null, _bag.Locate("sword"));



        }










    }
}
