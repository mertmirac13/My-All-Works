import tkinter as tk
from tkinter import filedialog
from PIL import Image, ImageTk, ImageEnhance,ImageFilter
import cv2
import numpy as np
import matplotlib.pyplot as plt

class ImageUploaderApp:
    def __init__(self, root):
        self.root = root
        self.root.title("Image Uploader")
        self.root.geometry("1180x900")  # Set window size
        self.root.configure(bg="#9932CC")  # Set background color

        # Variables
        self.image_path = tk.StringVar()
        button_names = [
            ("Black and White","#CD6600"),
            ("Adjust Contrast","#698B69"),
            ("Red Effect","#528B8B"),
            ("Blur Image","#CD1076"),
            ("HSV Effect","#009ACD"),
            ("Edge Detection","#EE2C2C"),
            ("Eroded Image","#EEB422"),
            ("Histogram","#228B22"),
            ("Gradient","#388E8E"),
            ("Dilation","#8B7E66")
        ]

        for i, (name, color) in enumerate(button_names):
            button = tk.Button(
                root,
                text=name,
                command=lambda name=name: self.button_clicked(name),
                bg=color,
                fg="white",  # Set text color to white for better visibility
                font=("Arial", 13)
            )
            button.grid(row=0, column=i, padx=8, pady=8, sticky="we")

        # Image Box
        self.image_box = tk.Label(root, bg="#9932CC")
        self.image_box.grid(row=1, column=0, columnspan=10, pady=10, sticky="nsew")

        # Upload Button
        upload_button = tk.Button(root, text="Upload Image", command=self.upload_image, bg="#CD1076", fg="white", font=("Comic Sans MS", 15))
        upload_button.grid(row=2, column=0, columnspan=10, pady=10, sticky="we")

        self.center_window()

    def center_window(self):
        self.root.update_idletasks()
        screen_width = self.root.winfo_screenwidth()
        screen_height = self.root.winfo_screenheight()

        window_width = self.root.winfo_width()
        window_height = self.root.winfo_height()

        x_coordinate = (screen_width - window_width) // 2
        y_coordinate = (screen_height - window_height) // 2

        self.root.geometry(f"+{x_coordinate}+{y_coordinate}")

    def upload_image(self):
        file_path = filedialog.askopenfilename(filetypes=[("Image files", "*.png;*.jpg;*.jpeg;*.gif")])

        if file_path:
            self.image_path.set(file_path)
            self.display_image()

    def display_image(self):
        image = Image.open(self.image_path.get())
        image = image.resize((450, 450))
        photo = ImageTk.PhotoImage(image)

        self.image_box.config(image=photo)
        self.image_box.image = photo
##siyah beyaz
    def black_and_white_effect(self):
        image = Image.open(self.image_path.get())
        bw_image = image.convert("L")  # Convert to black and white
        bw_image = bw_image.resize((450, 450))
        photo = ImageTk.PhotoImage(bw_image)
        self.image_box.config(image=photo)
        self.image_box.image = photo

##contrastlama
    def adjust_contrast(self):
        image = Image.open(self.image_path.get())
        contrast_factor = 1.5
        contrast_img = self.contrast_img(image,contrast_factor)
        contrast_img = contrast_img.resize((450,450))
        contrast_photo = ImageTk.PhotoImage(contrast_img)
        self.image_box.config(image=contrast_photo)
        self.image_box.image = contrast_photo

    def contrast_img(self,image,factor):
        enhancer = ImageEnhance.Contrast(image)
        contrast_image = enhancer.enhance(factor)
        return contrast_image

##contrastlama bitti


    def red_effect(self):
        # Resmi aç
        original_image = Image.open(self.image_path.get())

        # Resmi kırmızıya çevir
        red_image = ImageEnhance.Color(original_image).enhance(5)
        red_image = red_image.resize((450,450))

        # Resmi göster
        photo = ImageTk.PhotoImage(red_image)
        self.image_box.config(image=photo)
        self.image_box.image = photo

    def blur_image(self):
        # Resmi aç
        original_image = Image.open(self.image_path.get())

        # Resmi Gaussian blur et
        blur_radius = 10  # İstediğiniz blur seviyesini buradan ayarlayabilirsiniz
        blurred_image = original_image.filter(ImageFilter.GaussianBlur(blur_radius))
        blurred_image = blurred_image.resize((450, 450))

        # Resmi göster
        photo = ImageTk.PhotoImage(blurred_image)
        self.image_box.config(image=photo)
        self.image_box.image = photo

    def edges(self):
        original_image = cv2.imread(self.image_path.get())
        image_rgb = cv2.cvtColor(original_image, cv2.COLOR_BGR2RGB)  # Convert to RGB
        edges = cv2.Canny(image=image_rgb, threshold1=100, threshold2=200)

        # Convert numpy array to PIL image
        edges_image = Image.fromarray(edges)

        # Resize the image to fit the display
        edges_image = edges_image.resize((450, 450))

        # Convert PIL image to PhotoImage
        photo = ImageTk.PhotoImage(edges_image)

        # Update the image box
        self.image_box.config(image=photo)
        self.image_box.image = photo

    def eroded_image(self):
        original_image = cv2.imread(self.image_path.get())
        image_gray = cv2.cvtColor(original_image, cv2.COLOR_BGR2GRAY)
        kernel = np.ones((3, 3), np.uint8)
        eroded = cv2.erode(image_gray, kernel, iterations=2)

        # Convert numpy array to PIL image
        eroded_pil = Image.fromarray(eroded)

        # Resize the image to fit the display
        eroded_pil = eroded_pil.resize((450, 450))

        # Convert PIL image to PhotoImage
        photo = ImageTk.PhotoImage(eroded_pil)

        # Update the image box
        self.image_box.config(image=photo)
        self.image_box.image = photo



        plt.show()

    def histogram(self):
        img = cv2.imread(self.image_path.get())
        b, g, r = cv2.split(img)

        # plt.hist(img.ravel(), 256, [0,256])
        plt.hist(b.ravel(), 256, [0, 256])
        plt.hist(g.ravel(), 256, [0, 256])
        plt.hist(r.ravel(), 256, [0, 256])
        plt.show()

    def gradient(self):
        img = cv2.imread(self.image_path.get())
        kernel = np.ones((5, 5), np.uint8)
        gradient = cv2.morphologyEx(img, cv2.MORPH_GRADIENT, kernel)  # kenarları belirginleştiiyor
        gradient_image = Image.fromarray(gradient)
        gradient_image = gradient_image.resize((450, 450))
        photo = ImageTk.PhotoImage(gradient_image)
        self.image_box.config(image=photo)
        self.image_box.image = photo

    def dilation(self):
        img = cv2.imread(self.image_path.get())
        kernel = np.ones((5, 5), np.uint8)
        dilation = cv2.dilate(img, kernel, iterations = 10)
        dilation_image = Image.fromarray(dilation)
        dilation_image = dilation_image.resize((450, 450))
        photo = ImageTk.PhotoImage(dilation_image)
        self.image_box.config(image=photo)
        self.image_box.image = photo

    def hsv(self):
        img = cv2.imread(self.image_path.get())
        img = cv2.cvtColor(img, cv2.COLOR_BGR2HSV)
        image = Image.fromarray(img)
        image = image.resize((450, 450))
        photo = ImageTk.PhotoImage(image)
        self.image_box.config(image=photo)
        self.image_box.image = photo


    def button_clicked(self, operation):
        if operation == "Black and White":
            self.black_and_white_effect()

        elif operation == "Adjust Contrast":
            self.adjust_contrast()

        elif operation == "Red Effect":
            self.red_effect()

        elif operation == "Blur Image":
            self.blur_image()

        elif operation == "HSV Effect":
            self.hsv()

        elif operation == "Edge Detection":
            self.edges()

        elif operation == "Eroded Image":
            self.eroded_image()

        elif operation == "Histogram":
            self.histogram()

        elif operation == "Gradient":
            self.gradient()

        elif operation == "Dilation":
            self.dilation()

        else:
            print(operation)


if __name__ == "__main__":
    root = tk.Tk()
    app = ImageUploaderApp(root)
    root.mainloop()
