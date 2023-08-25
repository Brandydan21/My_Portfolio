using UnityEngine;
using System.Collections;
using Unity.VisualScripting;
using UnityEngine.UI;
using UnityEngine.SocialPlatforms.Impl;
using System.Collections.Generic;
using UnityEngine.SceneManagement;

public class Timer : MonoBehaviour
{
    public Image image;
    public Sprite newSprite;
    public float targetTime = 30.0f;
    public Text TimerText;
    private string TimerOutput = "TIME LEFT: ";

    // Start is called before the first frame update
    void Start()
    {
        TimerText.text = TimerOutput + targetTime;
    }

    // Update is called once per frame
    void Update()
    {
        targetTime -= Time.deltaTime;

        if (targetTime <= 0.0f)
        {
            timerEnded();
        }
        TimerText.text = TimerOutput + targetTime;
    }

    void timerEnded()
    {

        image.sprite = newSprite;
        image.color = new Color(1f, 1f, 1f, 1f);
        SceneManager.LoadScene("game_over_scene");
    }

}
