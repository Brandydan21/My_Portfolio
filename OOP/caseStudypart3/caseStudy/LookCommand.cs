using System;
using System.Xml.Linq;

namespace caseStudy
{
    public class LookCommand : Command
    {
        public LookCommand():
             base(new string[] {"look"})
        {
        }

        public override string Execute(Player p, string[] text)
        {
            if (text.Length == 3 || text.Length == 5)
            {
                if (text[0] == "look")
                {
                    if (text[1] == "at")
                    {
                        if (text.Length == 3)
                        {
                            return LookAtIn(text[2], p);
                        }
                        else if (text.Length == 5 && text[3] == "in")
                        {
                            if (FetchContainer(p, text[4]) != null)
                            {
                                return LookAtIn(text[2], FetchContainer(p, text[4]));
                            }
                            else
                            {
                                return String.Format("I can't find the {0}", text[4]);
                            }
                        }
                        else return "what do you want to look in";
                    }
                    else return "what do you want to look at";
                }
                else return "Error in look input";
            }
            else return "I don't know how to look like that";
        }

        private IHaveInventory FetchContainer(Player p,string containerId)
        {
            GameObject obj = p.Locate(containerId);

            IHaveInventory container = obj as IHaveInventory;
            return container;
        }

        private string LookAtIn(string thingId, IHaveInventory container)
        {
            
            if (container.Locate(thingId) != null)
            {
                return container.Locate(thingId).FullDescription;
            }
            else
            {
                return String.Format("I can't find the {0}", thingId);
            }
               
        }
    }
}

