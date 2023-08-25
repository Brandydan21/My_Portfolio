 using UnityEngine;
using System.Collections;
using Unity.VisualScripting;
using UnityEngine.UI;
using UnityEngine.SocialPlatforms.Impl;
using System.Collections.Generic;
using UnityEngine.SceneManagement;


public class EnemyScriptCopy: MonoBehaviour 
{
    private Rigidbody body;
	public bool randomForce = true;
	public float velocity = 20f;

	public GameObject controller;
	private GameplayController gameController;

	public GameObject impactParticle;
	private GameObject tempParticles;

    public int Style = 0;
    public Text styleText;
    private string styleOutput = "STYLE: ";

    public AudioClip[] audioClipArray;
    private AudioSource brickBounce;

    public AudioClip[] WallAudioArray;
    private AudioSource wallbounce;

    public AudioClip[] powerUpAudioArray;
    private AudioSource PowerUpSound;

    public AudioClip[] PlayerAudioArray;
    private AudioSource playerBounce;

    public Vector3 spawnpoint;

    private float originalYPos;

    private bool isArmed;

    private Animator anim;

    public GameObject objectToDuplicate;

    public string tagName;

    public Image image;
    public Sprite newWinImage;
    // Use this for initialization
    void Awake () 
	{
        originalYPos = transform.position.y;


		gameController = controller.GetComponent<GameplayController>();
		body = gameObject.GetComponent<Rigidbody>();
        spawnpoint = body.position; 
		body.AddForce(new Vector3(25, 0, 25), ForceMode.Impulse);


        styleText.text = styleOutput + Style;

        if (GameObject.Find("Ignored"))
        {
            var ignore = GameObject.Find("Ignored");
            DoIgnore(ignore.gameObject);
        }
    }

    void Start()
    {
        brickBounce = gameObject.GetComponent<AudioSource>();
        wallbounce = gameObject.GetComponent<AudioSource>();
        PowerUpSound = gameObject.GetComponent<AudioSource>();
        playerBounce = gameObject.GetComponent<AudioSource>();
        anim = Camera.main.GetComponent<Animator>();
    }

    void Update()
    {
        if (Style != 11)
        {
            styleText.text = styleOutput + Style;
            switch (Style)
            {
                case 7:
                    ShakeCam(2);
                    break;
                case 8:
                    ShakeCam(3);
                    break;
                case 9:
                    ShakeCam(4);
                    break;
                case 10:
                    ShakeCam(5);
                    break;
            }

        }
        else
        {
            styleText.text = "     !MUNGUS!";
            ShakeCam(1);
        }


        transform.position = new Vector3(transform.position.x, originalYPos, transform.position.z);
    }




void OnCollisionEnter(Collision col)
	{
        if (col.gameObject.tag == "OutOfBounds")
        {
            body.position = spawnpoint;
            body.AddForce(new Vector3(25, 0, 25), ForceMode.Impulse); //returns ball if it goes out of bounds

        }

        if (col.gameObject.tag == "Ignored")
        {
            DoIgnore(col.gameObject);
        }

        if (impactParticle != null)
		{
			tempParticles = (GameObject)Instantiate(impactParticle, transform.position, Quaternion.identity);
			tempParticles.GetComponent<ParticleSystem>().Play();
		}

        if (col.gameObject.tag == tagName || col.gameObject.tag == "PowerUp")
		{
            if (col.gameObject.tag == "PowerUp")
            {
                DoCrash(col.gameObject);
                DoPowerUpSound(powerUpAudioArray, PowerUpSound);
                Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
                body.velocity = reflection * velocity;
                body.AddForce(new Vector3(Random.Range(-2, 2), 0, -20), ForceMode.Impulse);
                DoDuplicateObject();               
            }

            else
            {
                DoCrash(col.gameObject);
                DoBrickSound(audioClipArray, brickBounce, Style);
                Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
                body.velocity = reflection * velocity;
                body.AddForce(new Vector3(Random.Range(-2, 2), 0, -20), ForceMode.Impulse);
            }
        }


        if (col.gameObject.tag == "FinalBrick")
        {
            isArmed = true;

            DoCrash(col.gameObject);
            DoBrickSound(audioClipArray, brickBounce, Style);
            Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
            body.velocity = reflection * velocity;
            body.AddForce(new Vector3(Random.Range(-2, 2), 0, -20), ForceMode.Impulse);

        }

        if (col.gameObject.tag == "Player")
        {
            DoPlayerSound(PlayerAudioArray, playerBounce, Style);
            if (isArmed == true)
            {
                WinGame();
            }
            else
            {
                DoStyle(Style, col);
                if (Style != 11)
                {
                    Style = Style + 1;
                }
            }

        }

        if (col.gameObject.tag == "Wall")
        {
            
            Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
            body.velocity = reflection * velocity;
            if (body.velocity.x > -10)
            {
                GoFast(reflection);
                if (body.velocity.x > -10)
                {
                    GoFast(reflection); //minimum velocity to avoid stagnation
                }
            }
            body.AddForce(new Vector3(0, 0, -30), ForceMode.Impulse);
        }
       
        if (col.gameObject.tag == "WallLeft")
        {
            DoWallSound(WallAudioArray, wallbounce);
            Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
            body.velocity = reflection * velocity;
            body.AddForce(new Vector3(5, 0, -30), ForceMode.Impulse); //prioritise left bouncing
        }

        if (col.gameObject.tag == "WallRight")
        {
            DoWallSound(WallAudioArray, wallbounce);
            Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
            body.velocity = reflection * velocity;
            body.AddForce(new Vector3(-5, 0, -30), ForceMode.Impulse); //prioritise right bouncing
        }

        if (col.gameObject.tag == "Baseline")
        {
            Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
            body.velocity = reflection * velocity;
            body.AddForce(new Vector3(Random.Range(-25, 25), 0, 10), ForceMode.Impulse);
            Style = 0;
        }
    }

    void DoCrash(GameObject col)
    {
        if (col.tag == tagName || col.tag == "PowerUp")
        {
            Destroy((Object)col);
        }
    }

    void DoIgnore(GameObject col)
    {
        if (col.tag == tagName || col.tag == "PowerUp")
        {
            Physics.IgnoreCollision(col.GetComponent<BoxCollider>(), controller.GetComponent<BoxCollider>(), true);
        }

    }

    void DoPowerUpSound(AudioClip[] powerUpAudioArray, AudioSource PowerUpSound)
    {
        PowerUpSound.clip = powerUpAudioArray[0];
        PowerUpSound.PlayOneShot(PowerUpSound.clip);
        PowerUpSound.Play();
    }

    void DoWallSound(AudioClip[] WallAudioArray, AudioSource wallbounce)
    {
        wallbounce.clip = WallAudioArray[0];
        wallbounce.PlayOneShot(wallbounce.clip);
        wallbounce.Play();
    }

    void DoBrickSound(AudioClip[] audioClipArray, AudioSource brickBounce, int Style)
    {

        if (Style > 0)
        {
            brickBounce.clip = audioClipArray[Style];
            brickBounce.PlayOneShot(brickBounce.clip);
            brickBounce.Play();
        }
        else
        {
            brickBounce.clip = audioClipArray[0];
            brickBounce.PlayOneShot(brickBounce.clip);
            brickBounce.Play();
        }

        //switch (Style)
        //{
        //    case 1:
        //        brickBounce.clip = audioClipArray[1];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    case 2:
        //        brickBounce.clip = audioClipArray[2];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    case 3:
        //        brickBounce.clip = audioClipArray[3];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    case 4:
        //        brickBounce.clip = audioClipArray[4];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    case 5:
        //        brickBounce.clip = audioClipArray[5];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    case 6:
        //        brickBounce.clip = audioClipArray[6];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    case 7:
        //        brickBounce.clip = audioClipArray[7];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //    default:
        //        brickBounce.clip = audioClipArray[0];
        //        brickBounce.PlayOneShot(brickBounce.clip);
        //        brickBounce.Play();
        //        break;
        //}
    }

    void DoPlayerSound(AudioClip[] PlayerAudioArray, AudioSource playerBounce, int Style)
    {

        if (Style > 0)
        {
            playerBounce.clip = PlayerAudioArray[Style];
            playerBounce.PlayOneShot(playerBounce.clip);
            playerBounce.Play();
        }
        else
        {
            playerBounce.clip = PlayerAudioArray[0];
            playerBounce.PlayOneShot(playerBounce.clip);
            playerBounce.Play();
        }
    }

        void DoStyle(int Style, Collision col)
    {

        //Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
        //body.velocity = reflection;
        body.AddForce(new Vector3(Random.Range(-4, 4), 0, (17 * Style)), ForceMode.Impulse);

        //Vector3 reflection = body.velocity.normalized + (2 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
        //body.velocity = reflection * (velocity + Style);
        //body.AddForce(new Vector3(0, 0, (10 * Style)), ForceMode.Impulse);

        //if (Style == 1)
        //{
        //    Vector3 reflection = body.velocity.normalized + (2.5 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
        //    body.velocity = reflection * velocity;
        //    Style = Style + 1;
        //}

        //if (Style == 2)
        //{
        //    Vector3 reflection = body.velocity.normalized + (3 * (Vector3.Dot(body.velocity.normalized, col.contacts[0].normal)) * col.contacts[0].normal);
        //    body.velocity = reflection * velocity;
        //    Style = Style + 1;
        //}
    }

    void GoFast(Vector3 reflection)
    {
        body.velocity = reflection * velocity;
    }

    void ShakeCam(int shakenum)
    {
        anim.SetTrigger("Shake" + shakenum);
    }


    void DoDuplicateObject()
    {
        GameObject duplicateObject = Instantiate(objectToDuplicate, transform.position, transform.rotation);
        duplicateObject.name = objectToDuplicate.name + " (Clone)";
        Destroy(duplicateObject, 5);
    }
    
    void WinGame()
    {
        image.sprite = newWinImage;
        image.color = new Color(1f, 1f, 1f, 1f);
        SceneManager.LoadScene("WinScreen");
    }
}
