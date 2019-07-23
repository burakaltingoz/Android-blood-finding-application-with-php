package com.example.isatan.burbo;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Window;
import android.view.WindowManager;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class ListActivity extends AppCompatActivity {
    ListView listele;    //listview tanımlandı
    String[] listData;
    private final static String DataURL="http://burakaltingoz.xyz/2den.php";
    ProgressDialog progressDialog;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list);
        Intent intent = getIntent();
        listele=(ListView) findViewById(R.id.liste);
        progressDialog=new ProgressDialog(this);
        progressDialog.setMessage("Loading");
        progressDialog.show();
        StringRequest stringRequest = new StringRequest(Request.Method.GET, DataURL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        try {
                            JSONObject jsonObject=new JSONObject(response);
                            JSONArray jsonArray=jsonObject.getJSONArray("KanBagisUyg");
                            int length=jsonArray.length();
                            listData=new String[length];
                            for (int i=0;i<length;i++){
                                JSONObject companyObject=jsonArray.getJSONObject(i);
                                String adSoy=companyObject.getString("adSoy");
                                String kanG= companyObject.getString("kanG");
                                String sehir= companyObject.getString("sehir");
                                String telNo= companyObject.getString("telNo");

                                listData[i]="Adı Soyadı: "+adSoy+"\n    Kan Grubu: "+kanG+"\n        Şehir: "+sehir+"\n           Telefon: " +telNo;
                            }
                            ArrayAdapter<String> adapter=new ArrayAdapter<String>(getApplicationContext(), R.layout.layout_list, listData);
                            listele.setAdapter(adapter);

                        } catch (JSONException e) {
                            e.printStackTrace();
                        }

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e("Error",error.getMessage());
                Toast.makeText(getApplicationContext(),error.getMessage(), Toast.LENGTH_SHORT);
            }
        });
        RequestQueue queue = Volley.newRequestQueue(this);
        queue.add(stringRequest);


    }
}