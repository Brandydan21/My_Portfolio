using System;
namespace caseStudy
{
    public abstract class GameObject : IdentifiableObject
    {
        private string _description;
        private string _name;


        public GameObject(string[] ids, string name, string desc) :
            base(ids)
        {
            _name = name;
            _description = desc;
        }

        public string Name
        {
            get
            {
                return _name;
            }
            
        }

        public string Description
        {
            get
            {
                return _description;
            }
        }

        public string ShortDescription
        {
            get
            {
                return String.Format("{0} ({1})" , Name, FirstId);
            }
            
            
        }

        public virtual string FullDescription
        {
            get
            {
                return _description;
            }
        }
    }
}

