using System;
namespace caseStudy
{
    public class Bag:Item, IHaveInventory
    {
        private Inventory _inventory = new Inventory();

        public Bag(string[] idents, string name, string desc) :
            base(idents, name, desc)
        {


        }

        public GameObject Locate(string id)
        {
            if (AreYou(id) == true)
            {
                return this;
            }
            else
            {
                return _inventory.Fetch(id);
            }


        }

        public override string FullDescription
        {
            get
            {
                return $"\nIn the {Name} you can see:\n{_inventory.ItemList}";


            }

        }

        public Inventory Inventory
        {
            get
            {
                return _inventory;
            }
        }

        
 
    }
}

