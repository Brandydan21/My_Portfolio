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
    public class TestInventory //Rename this appropriately.
    {

        private Inventory _Inventory;
        private Item ItemShovel;
        private Item ItemSword;

        [SetUp]
        public void SetUp()
        {
            _Inventory = new Inventory();
            ItemShovel = new Item(new string[] { "shovel", "spade" }, "a shovel", "this is a might fine...");
            ItemSword = new Item(new string[] { "sword", "blade" }, "a sword", "this is a might fine...");



        }


        [Test]
        public void TestFindItem()
        {
            _Inventory.Put(ItemShovel);
            Assert.AreEqual(true, _Inventory.HasItem("shovel"));

        }

        [Test]
        public void TestNoItemFound()
        {

            Assert.AreEqual(false, _Inventory.HasItem("shovel"));

        }

        [Test]
        public void TestFetchItem()
        {
            _Inventory.Put(ItemShovel);
            Assert.AreEqual( ItemShovel, _Inventory.Fetch("shovel"));
            Assert.AreEqual(true, _Inventory.HasItem("shovel"));
        }

        [Test]
        public void TestTakeItem()
        {
            _Inventory.Put(ItemShovel);
            Assert.AreEqual( ItemShovel, _Inventory.Take("shovel"));
            Assert.AreEqual(false, _Inventory.HasItem("shovel"));
        }

        [Test]
        public void TestItemList()
        {
            _Inventory.Put(ItemShovel);
            _Inventory.Put(ItemSword);


            Assert.AreEqual("\ta shovel (shovel)\n\ta sword (sword)\n", _Inventory.ItemList);
            
        }











    }
}
