using UnityEngine;
using System.Collections;

public class TriggeredEffect : MonoBehaviour 
{
	public enum triggerType {audio, particle, rigidbody};
	public Object attachedEffect;
	public triggerType _type;
	
	private AudioSource _audioSource;
	private ParticleSystem myParticles;
	private ParticleSystem.MainModule myMain;
	private bool canFire;
	private Rigidbody body;
	private bool unlocked;
	private bool lockSafety = false;
	void Awake()
	{
		if(attachedEffect == null)
			Debug.LogError("EFFECT MISSING FROM TRIGGERED EFFECT!, EXPECT MORE ERRORS!");
		if(_type == triggerType.audio)
		{
			_audioSource = this.gameObject.AddComponent<AudioSource>();
			_audioSource.clip = (AudioClip)attachedEffect;
			_audioSource.playOnAwake = false;
			_audioSource.loop = false;
		}
		if(_type == triggerType.rigidbody)
		{
			body = ((GameObject)attachedEffect).GetComponent<Rigidbody>();
			if(body.isKinematic)
				unlocked = false;
			else
				unlocked = true;
		}
	}

	void OnTriggerEnter(Collider col)
	{
		if(_type == triggerType.audio)
			_audioSource.Play();

		if(_type == triggerType.particle)
		{
			if(myParticles != null)
			{
				if(myMain.loop && myParticles.isStopped)
					myParticles.Play();
				else if(myMain.loop )
					myParticles.Stop();
			}
			else
			{
				myParticles = ((GameObject)Instantiate(attachedEffect, transform.position, Quaternion.identity)).GetComponent<ParticleSystem>();
				myMain = myParticles.main;
				myParticles.Play();
				if(!myMain.loop)
					StartCoroutine(CleanUp(myMain.duration));
			}
				

		}
		if(_type == triggerType.rigidbody)
		{
			if(!lockSafety)
			{
				body.isKinematic = !body.isKinematic;
				if(!body.isKinematic)
					body.AddForce(new Vector3(0,0.5f,0), ForceMode.Acceleration);
				unlocked = !unlocked;
				StartCoroutine(Safety());
			}
		}

	}

	IEnumerator Safety()
	{
		lockSafety = true;
		yield return new WaitForSeconds(0.5f);
		lockSafety = false;
	}

	IEnumerator CleanUp(float len)
	{
		yield return new WaitForSeconds(len);
		Destroy((GameObject)myParticles.gameObject);
	}
}
