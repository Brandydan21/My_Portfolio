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
    public class TestLookCommand //Rename this appropriately.
    {

        LookCommand myLook = new LookCommand();

        private Player myPlayer;
        private Item Gem;
        private Bag myBag;

        
    

        [SetUp]
        public void setup()
        {
            Gem = new Item(new string[] { "Gem" }, "Gem", "this is a gem");
            myBag = new Bag(new string[] { "bag" }, "Bag", "this is a bag");
            myPlayer = new Player("Brandy", "cool");


        }




        [Test]
        public void TestLookAtMe()
        {
            Assert.AreEqual("\nYou are Brandy cool.\nYou are carrying:\n", myLook.Execute(myPlayer, new string[] { "look", "at", "inventory" }));
           
        }

        [Test]
        public void TestLookAtGem()
        {
            myPlayer.Inventory.Put(Gem);
            Assert.AreSame("this is a gem", myLook.Execute(myPlayer, new string[] { "look", "at", "gem" }));
        }

        [Test]
        public void TestLookAtUnk()
        {
            Assert.AreEqual("I can't find the gem", myLook.Execute(myPlayer, new string[] { "look", "at", "gem" }));

        }

        [Test]
        public void TestLookAtGemInMe()
        {
            myPlayer.Inventory.Put(Gem);
            Assert.AreEqual("this is a gem", myLook.Execute(myPlayer, new string[] { "look", "at", "gem", "in", "Inventory"}));
        }

        [Test]
        public void TestGemInBag()
        {
            myPlayer.Inventory.Put(myBag);
            myBag.Inventory.Put(Gem);
            Assert.AreSame("this is a gem", myLook.Execute(myPlayer, new string[] { "look", "at", "gem", "in", "bag" }));
        }

        [Test]
        public void TestLookAtGeminNoBag()
        {
           
            Assert.AreEqual("I can't find the bag", myLook.Execute(myPlayer, new string[] {"look", "at", "gem", "in", "bag"}));
        }

        [Test]
        public void TestLookAtNoGemInBag()
        {
            myBag.Inventory.Put(Gem);   
            Assert.AreEqual("I can't find the bag", myLook.Execute(myPlayer, new string[] { "look", "at", "gem", "in", "bag" }));

        }

        [Test]
        public void TestInvalidLook()
        {
            Assert.AreEqual("I don't know how to look like that", myLook.Execute(myPlayer, new string[] { "look", "around"}));
            

        }


    }
}
