using UnityEngine;
using System.Collections;

public class PlayerExtention : MonoBehaviour 
{

	public GameObject Shield;

	void Awake()
	{

		if(Shield != null)
			Shield.SetActive(false);
	}

	void Update()
	{
		if(Shield != null)
		{
			if(Input.GetAxis("Fire2") >= 0.1f)
				Shield.SetActive(true);
			else
				Shield.SetActive(false);
		}
	}


}
