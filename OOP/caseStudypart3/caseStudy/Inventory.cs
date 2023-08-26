using System;
namespace caseStudy
{
    public class Inventory
    {
        private List<Item> _items = new List<Item>();

        public Inventory()
        {
        }

        public bool HasItem(string id)
        {
            foreach (Item i in _items)
            {
                if (i.AreYou(id) == true)
                {
                    return true;
                }
            }
            return false;

        }

        public void Put(Item itm)
        {
            _items.Add(itm);
        }

        public Item Take(string id)
        {
            foreach(Item i in _items)
            {
                if (i.AreYou(id) == true)
                {

                    _items.Remove(i);
                    return i;
                }

            }

            return null;
        }

        public Item Fetch(string id)
        {
            foreach(Item i in _items)
            {
                if (i.AreYou(id) == true)
                {
                    return i;
                }
            }
            return null;
        }

        public string ItemList
        {
            get
            {
                string item = "";
                foreach(Item i in _items)
                {
                    item += String.Format("\t{0}\n", i.ShortDescription);
                    
                }
                return item;
            }
        }

    }
}

