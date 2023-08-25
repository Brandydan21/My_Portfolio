
// COS30008, Problem Set 3, 2023

#pragma once

#include "DoublyLinkedList.h"
#include "DoublyLinkedListIterator.h"


template<typename T>
class List
{
private:
    using Node = typename DoublyLinkedList<T>::Node; //sharedpointer

    Node fHead;
    Node fTail;
    size_t fSize;

public:

    using Iterator = DoublyLinkedListIterator<T>;

    List() noexcept :
        fHead(),
        fTail(),
        fSize(0)
    {}


    List(const List& aOther):
        fHead(aOther.fHead),
        fTail(aOther.fTail),
        fSize(aOther.fSize)

    {}

    List& operator=(const List& aOther)
    {
        if (this != &aOther) 
        {
            new (this) List(aOther);
        }
        
        return *this;
    }


    List(List&& aOther) noexcept :
        List()
    {
        swap(aOther);
    }
    
    List& operator=(List&& aOther) noexcept
    {
        if (this != &aOther)
        {
            swap(aOther);
        }

        return *this;
    }
    
    void swap(List& aOther) noexcept
    {
        std::swap(fHead, aOther.fHead);
        std::swap(fTail, aOther.fTail);
        std::swap(fSize, aOther.fSize);
    }


    size_t size() const noexcept
    {
        return fSize;
    }

    template<typename U>
    void push_front(U&& aData)
    {

        if (fHead)
        {   
            Node lnode = DoublyLinkedList<T>::makeNode(std::forward<U>(aData));

            lnode->fNext = fHead;
            fHead->fPrevious = lnode;
            fHead = lnode;

        }
        else
        {   
            fHead = DoublyLinkedList<T>::makeNode(std::forward<U>(aData));
            fTail = fHead;
            
        }
        
        fSize++;
        
    }

    template<typename U>
    void push_back(U&& aData)
    {
        if (fTail)
        {
            Node lnode = DoublyLinkedList<T>::makeNode(std::forward<U>(aData));
            lnode->fPrevious = fTail;
            fTail->fNext = lnode;
            fTail = lnode;
            
        }
        else
        {
            fTail = DoublyLinkedList<T>::makeNode(std::forward<U>(aData));
            fHead = fTail;
        }
        
        fSize++;

    }

    void remove(const T& aElement) noexcept
    {
        Iterator lIter(fHead, fTail);
        
        Node current = fHead;
        bool found = false;
        
        for (auto& item : lIter)
        {   
            
            if (item == aElement)
            {   
                fSize--;
                found = true;
                break;
            }
            
            current = current->fNext;

        }
        
        if (found) 
        {
            if (current == fHead)
            {
                fHead = fHead->fNext;
                


            }
            else if (current == fTail)
            {
                fTail = fTail->fPrevious.lock();
                
            }
           
            current->isolate();
            
        }
        
    }

    const T& operator[](size_t aIndex) const
    {   
        assert(aIndex < fSize);
        Node current = fHead;

        for (size_t i = 0; i < aIndex; i++)
        {
            current = current->fNext;

        }
        return current->fData;

    }


    Iterator begin() const noexcept
    {   
        return Iterator(fHead, fTail).begin();
    }
    Iterator end() const noexcept
    {
        return Iterator(fHead, fTail).end();
    }
    Iterator rbegin() const noexcept
    {
        return Iterator(fHead, fTail).rbegin();
    }
    Iterator rend() const noexcept
    {
        return Iterator(fHead, fTail).rend();
    }
};
