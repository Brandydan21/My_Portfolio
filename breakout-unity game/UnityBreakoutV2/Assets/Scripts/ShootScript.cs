using UnityEngine;
using System.Collections;

public class ShootScript : MonoBehaviour 
{
	public Vector3 shootOffset;
	public GameObject shootPrefab;
	public Transform headDirection;
	public Vector3 objectRotation;
	public float shootForce = 30f;

	public AudioClip shootSound;
	private AudioSource shootSource;
	public GameObject shootParticle;
	private ParticleSystem shootSystem;

	void Awake()
	{
		shootSource = this.gameObject.AddComponent<AudioSource>();
		shootSource.loop = false;
		shootSource.playOnAwake = false;
		if(shootSound != null)
			shootSource.clip = shootSound;

	}

	void Update () 
	{
		if(Input.GetButtonDown("Fire1"))
		{
			//transforms the instantiate position into world space based on the head rotation
			Vector3 origin = headDirection.TransformDirection(shootOffset);

			//instatiates the shootPrefab, sets its position/rotation and stores its rigidbody
			GameObject projectile = (GameObject)Instantiate(shootPrefab, transform.position + origin + new Vector3(0, 2, 0), Quaternion.Euler(objectRotation));

			//adds force to the objecct
			if(projectile.GetComponent<Rigidbody>() != null)
			{
				Rigidbody projectileRigidbody = projectile.GetComponent<Rigidbody>();
				projectileRigidbody.AddForce(origin * shootForce, ForceMode.Impulse);
				if(shootParticle != null)
				{
					shootSystem = ((GameObject)Instantiate(shootParticle, transform.position + origin + new Vector3(0, 2, 0), headDirection.rotation)).GetComponent<ParticleSystem>();
					Destroy((GameObject)shootSystem.gameObject,shootSystem.main.duration);
				}
				if(shootSound != null)
					shootSource.Play();
			}
			else 
				Debug.LogError("The gameobject you are trying to use does not have a rigidbody");
		}
	}
}
