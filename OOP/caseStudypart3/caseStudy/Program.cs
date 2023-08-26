using System;

namespace caseStudy 
{
    internal class Program
    {
        

        static void Main(string[] args)
        {

                Console.WriteLine("Enter a name");
                string name = Console.ReadLine();
                Console.WriteLine("Enter a description");
                string desc = Console.ReadLine();

            
                Player player = new Player(name, desc);

                Item itemShovel = new Item(new string[] { "shovel", "spade" }, "a shovel", "this is a might fine shovel");

                Item itemSword = new Item(new string[] { "sword", "blade" }, "a sword", "this is a might fine sword");

                Bag bag = new Bag(new string[] { "bag"}, "bag", "This is a bag");

                Item gem = new Item(new string[] { "Gem" }, "Gem", "this is a gem");



                player.Inventory.Put(itemShovel);
                player.Inventory.Put(itemSword);
                player.Inventory.Put(bag);
                bag.Inventory.Put(gem);


                bool cont = true;

            while (cont == true)
            {
                string enter = "";

                
                Console.WriteLine("Enter Commnads: ");
                enter = Console.ReadLine().ToLower();

                if (enter == "quit")
                {
                    cont = false;
                }
                else
                {
                    string[] command = enter.Split(" ", StringSplitOptions.RemoveEmptyEntries);


                    LookCommand com = new LookCommand();
                    Console.WriteLine(com.Execute(player, command)); 
                }
                                

            }


        }
    }
}

