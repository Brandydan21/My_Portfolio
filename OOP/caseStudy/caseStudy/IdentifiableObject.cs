using System;
namespace caseStudy
{
    public class IdentifiableObject
    {
        protected List<string> _identifiers = new List<string>();

        public IdentifiableObject(string[] idents)
        {
            foreach (var i in idents)
            {
                
                _identifiers.Add(i.ToLower());
            }


        }


        public bool AreYou(string id)
        {

            if (_identifiers.Contains(id.ToLower()))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public void AddIdentifer(string id)
        {

            _identifiers.Add(id.ToLower());
        }

        public string FirstId
        {
            get
            {
                if(_identifiers.Count > 0)
                {
                    return _identifiers[0];
                }
                else
                {
                    return "";
                }
                
            }
        }
    }
}

