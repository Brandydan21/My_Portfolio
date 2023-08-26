using System;
namespace caseStudy
{
    public class Player : GameObject
    {
        private Inventory _inventory = new Inventory();

        public Player(string name, string desc) :
            base (new string[] { "me" , "inventory"}, name, desc)
        {
           
        }

        public GameObject Locate (string id)
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
                return $"\nYou are {_name} {_description}.\nYou are carrying:\n{_inventory.ItemList}";

                
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

