using UnityEngine;
using System.Collections;

public class GoalTrigger : MonoBehaviour 
{
	public GameObject controller;
	private GameplayController gameController;

	public AudioClip scoreSound;
	private AudioSource scoreSource;
	
	public GameObject scoreParticle;
	private GameObject tempParticles;
	void Awake()
	{
		gameController = controller.GetComponent<GameplayController>();
		if(scoreSound != null)
		{
			scoreSource = gameObject.AddComponent<AudioSource>();
			scoreSource.clip = scoreSound;
			scoreSource.loop = false;
			scoreSource.playOnAwake = false;
		}
	}
	void OnTriggerEnter(Collider col)
	{
		if(col.tag == "Enemy")
		{
			gameController.UpdateScore();

			if(scoreSound != null)
				if(scoreSound != null)scoreSource.Play();
			if(scoreParticle != null)
			{
				tempParticles = (GameObject)Instantiate(scoreParticle, transform.position, Quaternion.identity);
				tempParticles.GetComponent<ParticleSystem>().Play();
			}

		}
	}
	IEnumerator CleanUp()
	{
		yield return new WaitForSeconds(tempParticles.GetComponent<ParticleSystem>().main.duration);
		Destroy((Object)tempParticles);
	}
}
