using UnityEngine;
using System.Collections;

public class ProjectileScript : MonoBehaviour 
{
	public AudioClip collisionSound;
	private AudioSource collisionSource;
	public GameObject collisionParticle;
	private GameObject sourceObj;
	public string tagName;

	void Awake()
	{
		sourceObj = new GameObject();
		sourceObj.transform.parent = this.transform;
		collisionSource = sourceObj.AddComponent<AudioSource>();
		collisionSource.loop = false;
		collisionSource.playOnAwake = false;
		if(collisionSound != null)
			collisionSource.clip = collisionSound;
	}

	void OnCollisionEnter(Collision col)
	{
		DoStuff(col.gameObject);
	}

	void OnTriggerEnter(Collider col)
	{
		DoStuff(col.gameObject);
	}

	void DoStuff(GameObject col)
	{
		if(collisionSound != null)
		{
			collisionSource.Play();
			sourceObj.transform.parent = null;
			Destroy(sourceObj, collisionSound.length+1f);
		}
		if(collisionParticle != null)
		{
			GameObject temp =  (GameObject)Instantiate(collisionParticle, transform.position, Quaternion.identity);
			ParticleSystem ps = temp.GetComponent<ParticleSystem>();
			ps.Play();
			Destroy(temp, ps.main.duration+1f);
		}
		if(col.tag == tagName)
		{
			Destroy((Object)col);
		}
		Destroy((Object)this.gameObject);
	}

}
