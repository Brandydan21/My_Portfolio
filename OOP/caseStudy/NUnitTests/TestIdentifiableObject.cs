
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
    public class TestIdentifiableObject //Rename this appropriately.
    {
        
        
        private IdentifiableObject id;
        
        
        [SetUp]
        public void SetUp()
        {      
            id = new IdentifiableObject(new string [] {"Fred", "Bob"}); 
        }

        
        [Test]
        public void TestAreYou()
        {
            Assert.AreEqual(true, id.AreYou("Fred"));
            Assert.AreEqual(true, id.AreYou("Bob"));
        }

        [Test]
        public void TestNotAreYou()
        {
            Assert.AreEqual(false, id.AreYou("John"));
        }

        [Test]
        public void TestCaseSensitivity()
        {
            Assert.AreEqual(true, id.AreYou("FRED"));
            Assert.AreEqual(true, id.AreYou("BOB"));
        }

        [Test]
        public void TestFirstId()
        {
            Assert.AreEqual("fred", id.FirstId);
            
        }

        [Test]
        public void TestFirstIdWithNoIds()
        {
            Assert.AreEqual("", id.FirstId);
        }


        [Test]
        public void TestAddId()
        {
            id.AddIdentifer("Wilma");
            Assert.AreEqual(true, id.AreYou("wilma"));
        }


    }
}

