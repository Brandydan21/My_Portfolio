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
    public class TestPlayer //Rename this appropriately.
    {


        private Player _Player;
        private Item ItemShovel;

        [SetUp]
        public void SetUp()
        {

            _Player = new Player("Brandy", "Cool");
            ItemShovel = new Item(new string[] { "shovel", "spade" }, "a shovel", "this is a might fine...");
        }


        [Test]
        public void testplayerisidentifiable()
        {
            Assert.IsTrue(_Player.AreYou("me"));
            Assert.IsTrue(_Player.AreYou("inventory"));



        }

        [Test]
        public void locatesItems()
        {
            _Player.Inventory.Put(ItemShovel);
            Assert.AreEqual(ItemShovel , _Player.Locate("shovel"));
            

        }

        [Test]
        public void LocatesPlayerItself()
        {
            Assert.AreEqual(_Player, _Player.Locate("me"));
        }

        [Test]
        public void locatesNothing()
        {
            Assert.AreEqual(null, _Player.Locate("car"));
        }

        [Test]
        public void PlayerFullDescription()
        {
            _Player.Inventory.Put(ItemShovel);
            Assert.AreEqual("\nYou are Brandy Cool.\nYou are carrying:\n\ta shovel (shovel)\n", _Player.FullDescription);
        }











    }
}
